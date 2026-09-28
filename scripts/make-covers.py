# Renders the front page of each archive PDF as a small JPEG and WebP preview
# for the archive page. To add an issue, save the PDF as
# site/archive/linden-herald-YYYY-MM-DD.pdf, then run:
#   python scripts/make-covers.py
# Requires PyMuPDF and Pillow (pip install pymupdf pillow).
# Existing covers are left as they are.
import re
from pathlib import Path

import fitz
from PIL import Image

SITE = Path(__file__).resolve().parent.parent / 'site'
COVERS = SITE / 'images' / 'covers'
WIDTH = 440  # twice the displayed width, for sharp covers on high-density screens

COVERS.mkdir(parents=True, exist_ok=True)
for pdf in sorted((SITE / 'archive').glob('*.pdf')):
    date = re.fullmatch(r'linden-herald-(\d{4}-\d{2}-\d{2})\.pdf', pdf.name)
    if not date:
        print(f'Skipped {pdf.name}: rename it to linden-herald-YYYY-MM-DD.pdf')
        continue
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
