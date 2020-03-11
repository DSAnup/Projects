from django.urls import path
from . import views
from django.conf.urls import url

urlpatterns = [
    path('', views.index, name = 'index'),
    path('<slug:slug>', views.news_details, name = 'news_details'),
    url(r'^news_category/(?P<pk>\d+)$', views.categories, name='categories'),
    # path('<int:int>', views.categories, name = 'categories')
]