from django.shortcuts import render
from .models import *
# Create your views here.

def index(request):
    dest = Destination.objects.all()
    newpost = Besttrip.objects.all().order_by('date')

    return render(request, 'index.html', {'dests': dest,
                                          'newposts': newpost})