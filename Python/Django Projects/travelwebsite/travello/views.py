from django.shortcuts import render, redirect, HttpResponseRedirect
from django.contrib import messages
from django.db.models import Q
from .models import *
from news.models import *
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
    b.save()
    if b.save:
        messages.success(request, 'Subsciption successfully completed')
        return redirect('/')
    else:
        messages.error(request, 'Sorry')
        return redirect('/')

def destinations(request):
    city = request.POST['city']
    budget = request.POST['budget']
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    res = Destination.objects.filter(
                name__contains = city
            ).all() | Destination.objects.filter(
                price__contains = budget
            ).all()
    cate = CategoryDes.objects.all()
    return render(request, 'destinations.html', {'result':res,
                                                  'footer': footercontact,
                                                  'testi': testi,
                                                  'homestatic': homesta,
                                                    'category': cate
                                                 })

def about(request):
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    aboutsta = about_us_fixed.objects.first()
    field_value = aboutsta.brief.split('\n', 1)[0]
    ab = aboutsta.brief.split('\n', 1)[1][:500]+'...'
    why = why_choose_us.objects.all()
    teams = team.objects.all().order_by('name')[:4]
    return render(request, 'about.html', {'ab': ab,
                                          'abs': aboutsta,
                                            'footer': footercontact,
                                            'testi': testi,
                                            'homestatic': homesta,
                                            'field' : field_value,
                                            'why': why,
                                            'team': teams,
                                          })

def contact(request):
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    address = Address.objects.first()
    return render(request, 'contact.html', {'address': address,
                                            'footer': footercontact,
                                            'testi': testi,
                                            'homestatic': homesta})

def sendmsg(request):
    name = request.POST['name']
    email = request.POST['email']
    subject = request.POST['subject']
    message = request.POST['message']
    Query.objects.create(
        name = name,
        email = email,
        subject = subject,
        message = message
    ).save()
    messages.success(request, 'Subsciption successfully completed')
    return redirect('/contact')