"""inventory_management URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include
from . import views
from django.conf.urls import url
from rest_framework import routers

router = routers.DefaultRouter()
router.register(r'users', views.UserViewSet)
router.register(r'groups', views.GroupViewSet)


urlpatterns = [
    # path('', views.index, name = 'index'),
    url(r'^$', views.index , name='index'),

    url(r'^display_laptops$', views.display_laptops, name='display_laptops'),
    url(r'^display_desktop$', views.display_desktop, name='display_desktop'),
    url(r'^display_mobile$', views.display_mobile, name='display_mobile'),

    url(r'^add_laptop$', views.add_laptop, name='add_laptop'),
    url(r'^add_mobile$', views.add_mobile, name='add_mobile'),
    url(r'^add_desktop$', views.add_desktop, name='add_desktop'),

    url(r'^edit_laptop/(?P<pk>\d+)$', views.edit_laptop, name='edit_laptop'),
    url(r'^edit_desktop/(?P<pk>\d+)$', views.edit_desktop, name='edit_desktop'),
    url(r'^edit_mobile/(?P<pk>\d+)$', views.edit_mobile, name='edit_mobile'),

    url(r'^delete_laptop/(?P<pk>\d+)$', views.delete_laptop, name='delete_laptop'),
    url(r'^delete_desktop/(?P<pk>\d+)$', views.delete_desktop, name='delete_desktop'),
    url(r'^delete_mobile/(?P<pk>\d+)$', views.delete_mobile, name='delete_mobile'),

    url(r'^api/(?P<string>.+)/$', views.deviceallviewapi.as_view()),
]
