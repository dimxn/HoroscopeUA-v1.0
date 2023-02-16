import eel
import requests
from bs4 import BeautifulSoup


eel.init('web')


@eel.expose
def parse_site(site, selector, selector_class):
    soup = BeautifulSoup(site, 'lxml')
    return soup.find_all(selector, class_=selector_class)


@eel.expose
def horoscope(number):
    site = requests.get(f"https://fakty.ua/horoscope/{number}")
    site = site.text
    result = parse_site(site, 'div', 'column1')
    return [results.string for results in result]


# print(horoscope(2))
eel.start('index.html')
