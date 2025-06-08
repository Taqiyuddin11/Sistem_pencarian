import requests
from bs4 import BeautifulSoup
import mysql.connector
from urllib.parse import urljoin

db = mysql.connector.connect(host="localhost", user="root", password="", database="web")
cursor = db.cursor()

visited = set()

def crawl(url, parent_id=None):
    if url in visited or len(visited) >= 10:
        return
    visited.add(url)

    try:
        response = requests.get(url, timeout=5)
        soup = BeautifulSoup(response.text, 'html.parser')
        content = soup.get_text(separator=' ', strip=True)

        cursor.execute("INSERT INTO crawler (url, content) VALUES (%s, %s)", (url, content))
        db.commit()
        current_id = cursor.lastrowid

        if parent_id:
            cursor.execute("INSERT INTO hyperlink (from_node, to_node) VALUES (%s, %s)", (parent_id, current_id))
            db.commit()

        for a in soup.find_all('a', href=True):
            link = urljoin(url, a['href'])
            if "um.ac.id" in link:
                crawl(link, current_id)

    except Exception as e:
        print(f"Gagal akses {url}: {e}")

crawl("https://elektro.um.ac.id/")
cursor.close()
db.close()
