from django.shortcuts import render, redirect, get_object_or_404
from .models import *
from .forms import *

from django.contrib.auth.models import User, Group
from rest_framework import viewsets
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .serializers import *

# Create your views here.
def index(request):
    return render(request, 'index.html')

def display_laptops(request):
    items = Laptop.objects.all()
    context = {
        'items' : items,
        'header' : 'Laptops',
    }
    return render(request, 'index.html', context)

def display_desktop(request):
    items = Desktop.objects.all()
    context = {
        'items' : items,
        'header' : 'Desktop',
    }
    return render(request, 'index.html', context)

def display_mobile(request):
    items = Mobile.objects.all()
    context = {
        'items' : items,
        'header' : 'Mobile',
    }
    return render(request, 'index.html', context)

def add_device(request, cls):
    if request.method == 'POST':
        form = cls(request.POST)

        if form.is_valid():
            form.save()
            return redirect('index')
    else:
        form = cls()
        return render(request, 'add_new.html', {'form': form})

def add_laptop(request):
    return add_device(request, LaptopForm)


def add_desktop(request):
    return add_device(request, DesktopForm)

def add_mobile(request):
    return add_device(request, MobileForm)

def edit_device(request, pk, model, cls, redir):
    item = get_object_or_404(model, pk= pk)

    if request.method == 'POST':
        form = cls(request.POST, instance = item)
        if form.is_valid():
            form.save()
            return redirect(redir)
    else:
        form = cls(instance = item)
        return render(request, 'edit_item.html', {'form': form})

def edit_laptop(request, pk):
    return edit_device(request, pk, Laptop, LaptopForm, display_laptops)

def edit_desktop(request, pk):
    return edit_device(request, pk, Desktop, DesktopForm, display_desktop)

def edit_mobile(request, pk):
    return edit_device(request, pk, Mobile, MobileForm, display_mobile)


def delete_device(request, pk, model):
    model.objects.filter(id=pk).delete()

    items = model.objects.all()
    context = {
        'items' : items
    }

    return render(request, 'index.html', context)

def delete_laptop(request, pk):
    return delete_device(request, pk, Laptop)

def delete_desktop(request, pk):
    return delete_device(request, pk, Desktop)

def delete_mobile(request, pk):
    return delete_device(request, pk, Mobile)

class UserViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows users to be viewed or edited.
    """
    queryset = User.objects.all().order_by('-date_joined')
    serializer_class = UserSerializer


class GroupViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows groups to be viewed or edited.
    """
    queryset = Group.objects.all()
    serializer_class = GroupSerializer


class deviceallviewapi(APIView):
    def get(self, request, string):
        name = string
        if name == 'desktop':
            device = Desktop.objects.all()
        elif name == 'mobile':
            device = Mobile.objects.all()
        else:
            device = Laptop.objects.all()
        serializer = DeviceSerializers(device, many=True)
        return Response(serializer.data)
