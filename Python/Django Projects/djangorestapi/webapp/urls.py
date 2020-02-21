
from django.urls import path
from . import views
urlpatterns = [
    path('', views.employeList.as_view()),
]
