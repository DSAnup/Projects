from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name = 'index'),
    path('subsciption', views.subsciption, name = 'subsciption')
]