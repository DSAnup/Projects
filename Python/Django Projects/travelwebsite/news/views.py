from django.shortcuts import render
from travello.models import *
# Create your views here.
def index(request):
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    return render(request, 'news.html', {
        'footer': footercontact,
        'testi': testi,
        'homestatic': homesta})