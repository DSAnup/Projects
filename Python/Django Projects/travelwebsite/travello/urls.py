from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name = 'index'),
    path('subsciption', views.subsciption, name = 'subsciption'),
    path('destinations', views.destinations, name = 'destinations'),
    path('about', views.about, name = 'about'),
    path('contact', views.contact, name = 'contact'),
    path('sendmsg', views.sendmsg, name= 'sendmsg'),
]