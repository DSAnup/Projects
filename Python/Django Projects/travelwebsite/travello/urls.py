from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name = 'index'),
    path('subsciption', views.subsciption, name = 'subsciption'),
    path('search', views.search_query, name = 'search_query'),
    path('about', views.about, name = 'about'),
    path('contact', views.contact, name = 'contact'),
    path('news', views.news, name = 'news')
]