# Renders the front page of each archive PDF as a small JPEG preview for the
# archive page. Run after adding a new issue: python scripts/make-covers.py
# Requires PyMuPDF (pip install pymupdf). Existing covers are left as they are.
import re
from pathlib import Path

import fitz

ROOT = Path(__file__).resolve().parent.parent / 'dist' / 'client'
COVERS = ROOT / 'images' / 'covers'
WIDTH = 440  # twice the displayed width, for sharp covers on high-density screens

COVERS.mkdir(parents=True, exist_ok=True)
for pdf in sorted((ROOT / 'archive').glob('*.pdf')):
    date = re.search(r'(\d{4})(\d{2})(\d{2})', pdf.name)
    if not date:
        print(f'Skipped {pdf.name}: no date in the file name')
        continue
    cover = COVERS / f'{"-".join(date.groups())}.jpg'
    if cover.exists():
        continue
    with fitz.open(pdf) as document:
        page = document[0]
        zoom = WIDTH / page.rect.width
        pixmap = page.get_pixmap(matrix=fitz.Matrix(zoom, zoom), alpha=False)
        pixmap.save(cover, jpg_quality=80)
    print(f'Created {cover.relative_to(ROOT)} ({pixmap.width}x{pixmap.height})')
