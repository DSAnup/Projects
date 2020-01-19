import requests
import bs4
import json
import base64

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'}
print("Please enter your amazon product link")
url = input().strip()
response = requests.get(url, headers= headers)
soup = bs4.BeautifulSoup(response.content, features='lxml')
title = soup.select("#productTitle")[0].get_text().strip()
print(title)
categories = []
for li in soup.select("#wayfinding-breadcrumbs_container ul.a-unordered-list")[0].findAll("li"):
    categories.append(li.get_text().strip())
print(categories)
features = []
for li in soup.select("#feature-bullets ul.a-unordered-list")[0].findAll("li"):
    features.append(li.get_text().strip())
print(features)
price = soup.select("#priceblock_ourprice")[0].get_text()
print(price)
review_count = soup.select("#acrCustomerReviewText")[0].get_text().split()
print(review_count)
try:
    availability = soup.select("#availability")[0].get_text().strip()
    print(availability)
except:
    print('Not found')
    availability = 'not found'
for li in soup.select("#imgTagWrapperId")[0].findAll("img"):
    lnk = li["src"].strip()
    print(lnk)
    filename = title +'.jpeg'
    with open(filename, 'wb') as f:
        f.write(base64.b64decode(lnk[23:]))

jsonObject = {'title': title, 'categories': categories, 'features': features, 'price': price, 'review_count': review_count, 'availability': availability}

with open(title+'.json', 'w') as f:
    json.dump(jsonObject, f)