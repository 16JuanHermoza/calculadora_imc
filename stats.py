import os
import json
from collections import defaultdict

# Extensiones comunes de lenguajes
EXTENSIONS = {
    '.py': 'Python',
    '.js': 'JavaScript',
    '.ts': 'TypeScript',
    '.java': 'Java',
    '.cpp': 'C++',
    '.c': 'C',
    '.cs': 'C#',
    '.html': 'HTML',
    '.css': 'CSS',
    '.php': 'PHP',
    '.rb': 'Ruby',
    '.go': 'Go',
    '.rs': 'Rust',
    '.swift': 'Swift'
}

def get_language(file):
    _, ext = os.path.splitext(file)
    return EXTENSIONS.get(ext.lower())

def main():
    stats = defaultdict(int)
    total = 0

    for root, _, files in os.walk('.'):
        if '.git' in root:
            continue
        for file in files:
            path = os.path.join(root, file)
            lang = get_language(file)
            if lang:
                try:
                    size = os.path.getsize(path)
                    stats[lang] += size
                    total += size
                except:
                    pass

    percentages = {lang: round((size / total) * 100, 2) for lang, size in stats.items()}

    with open('language_stats.json', 'w') as f:
        json.dump(percentages, f, indent=4)

if __name__ == '__main__':
    main()
