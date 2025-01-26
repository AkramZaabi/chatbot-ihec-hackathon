import json
from bs4 import BeautifulSoup
import requests

# Fetch the webpage
url = 'https://ihec.rnu.tn/fr'
page = requests.get(url)
soup = BeautifulSoup(page.text, 'html.parser')

# Create a dictionary to store the scraped data (for example, you can extract specific elements like title, links, etc.)
data = {
    "title": soup.title.string if soup.title else None,
    "links": [a['href'] for a in soup.find_all('a', href=True)]
}

# Save the data into a JSON file
with open('scraped_data.json', 'w', encoding='utf-8') as json_file:
    json.dump(data, json_file, ensure_ascii=False, indent=4)
