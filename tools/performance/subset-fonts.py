"""Build WOFF2/TTF subsets from the existing licensed Font Awesome fonts.
Run after build.mjs. pip install -r requirements.txt; python subset-fonts.py.
"""
from pathlib import Path
import sys
sys.path.insert(0, str(Path(__file__).parent / '.local/python'))
from fontTools import subset
from fontTools.ttLib import TTFont

root = Path(__file__).resolve().parents[2]
fonts = root / 'wp-content/themes/MWhoster-child/assets/fonts'
target = fonts / 'subsets'
target.mkdir(exist_ok=True)
unicodes = [int(v[2:], 16) for v in (fonts / 'subset-unicodes.txt').read_text().split(',')]
for stem in ('fa-solid-900', 'fa-regular-400', 'fa-brands-400', 'fa-v4compatibility'):
    for ext in ('woff2', 'ttf'):
        font = TTFont(fonts / (stem + '.ttf'), recalcTimestamp=False)
        options = subset.Options()
        options.name_IDs = ['*']  # Preserve copyright, license, attribution and naming records.
        options.name_legacy = True
        options.name_languages = ['*']
        options.recalc_timestamp = False
        s = subset.Subsetter(options=options)
        s.populate(unicodes=unicodes)
        s.subset(font)
        font.flavor = 'woff2' if ext == 'woff2' else None
        font.save(target / (stem + '.' + ext))
        print(stem + '.' + ext, (target / (stem + '.' + ext)).stat().st_size)
