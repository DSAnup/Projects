from django.shortcuts import render, redirect
from django.contrib import messages

from .models import *
# Create your views here.

def index(request):
    dest = Destination.objects.all()
    newpost = Besttrip.objects.all().order_by('date')
    slider = Homeslider.objects.all().order_by('id')
    intros = Intro.objects.all()
    besttrip = Besttrip.objects.all()
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    return render(request, 'index.html', {'dests': dest,
                                          'newposts': newpost,
                                          'slider': slider,
                                          'intros': intros,
                                          'besttrips': besttrip,
                                          'footer': footercontact,
                                          'testi': testi,
                                          'homestatic': homesta})

def subsciption(request):
    name = request.POST['name']
    email = request.POST['email']
    b = Subscibtion(name= name, email = email)
    # e = b.save()
    # print(e)
    if b.save():
        messages.info(request, 'Subsciption successfully completed')
        return redirect('/')
    else:
        messages.error(request, 'Sorry')
        return redirect('/')