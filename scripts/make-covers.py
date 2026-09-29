# Prepares each archive PDF for the website. To add an issue, save the PDF as
# site/archive/linden-herald-YYYY-MM-DD.pdf, then run:
#   python scripts/make-covers.py
# Requires PyMuPDF and Pillow (pip install pymupdf pillow).
#
# For each new issue it:
#   1. shrinks the photos to 150 dpi (the text stays sharp and searchable),
#      so issues download quickly on phones and stay under Cloudflare's
#      25 MiB file limit, and sets the title search engines show;
#   2. renders the front page as a small JPEG and WebP preview.
# Issues that already carry the right title, and existing covers, are left as they are.
import re
from datetime import date as Date
from pathlib import Path

import fitz
from PIL import Image

SITE = Path(__file__).resolve().parent.parent / 'site'
COVERS = SITE / 'images' / 'covers'
WIDTH = 440  # twice the displayed width, for sharp covers on high-density screens


def prepare(pdf, issue_date):
    day = Date.fromisoformat(issue_date)
    title = f'Linden Herald, {day:%B} {day.day}, {day.year}'
    with fitz.open(pdf) as document:
        if document.metadata.get('title') == title:
            return
        before = pdf.stat().st_size
        document.rewrite_images(dpi_threshold=200, dpi_target=150, quality=75)
        document.set_metadata({
            'title': title,
            'author': 'Linden Herald',
            'subject': 'Weekly community newspaper for Linden and East San Joaquin County, California',
            'keywords': 'Linden Herald, Linden California, San Joaquin County, local news, legal notices',
            'creator': document.metadata.get('creator') or '',
            'producer': document.metadata.get('producer') or ''
        })
        temporary = pdf.with_suffix('.tmp')
        document.save(temporary, garbage=4, deflate=True, use_objstms=1)
    temporary.replace(pdf)
    print(f'Prepared {pdf.name}: {before / 1048576:.1f} MB to {pdf.stat().st_size / 1048576:.1f} MB')


COVERS.mkdir(parents=True, exist_ok=True)
for pdf in sorted((SITE / 'archive').glob('*.pdf')):
    date = re.fullmatch(r'linden-herald-(\d{4}-\d{2}-\d{2})\.pdf', pdf.name)
    if not date:
        print(f'Skipped {pdf.name}: rename it to linden-herald-YYYY-MM-DD.pdf')
        continue
    prepare(pdf, date[1])
    cover = COVERS / f'{date[1]}.jpg'
    if not cover.exists():
        with fitz.open(pdf) as document:
            page = document[0]
            zoom = WIDTH / page.rect.width
            page.get_pixmap(matrix=fitz.Matrix(zoom, zoom), alpha=False).save(cover, jpg_quality=80)
        print(f'Created {cover.relative_to(SITE)}')
    webp = cover.with_suffix('.webp')
    if not webp.exists():
        Image.open(cover).save(webp, 'WEBP', quality=78, method=6)
        print(f'Created {webp.relative_to(SITE)}')
