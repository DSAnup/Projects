from django.db.models import Count
from django.shortcuts import render
from travello.models import *
from django.core.paginator import Paginator, PageNotAnInteger, EmptyPage
from .models import *
from django.shortcuts import render, get_object_or_404

# Create your views here.
def index(request):
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    newscat = Category.objects.annotate(
        nums = Count('news')
    )
    page = request.GET.get('page', 1)
    news = News.objects.all().order_by('-id')
    newslatest = News.objects.all().order_by('-date')[:3]
    paginator = Paginator(news, 2)
    try:
        newsall = paginator.page(page)
    except PageNotAnInteger:
        newsall = paginator.page(1)
    except EmptyPage:
        newsall = paginator.page(paginator.num_pages)

    return render(request, 'news.html', {
        'footer': footercontact,
        'testi': testi,
        'homestatic': homesta,
        'newsall': newsall,
        'newscat': newscat,
        'newslatest': newslatest,
    })

def news_details(request, slug):
    news2 = get_object_or_404(News, slug = slug)
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    newscat = Category.objects.annotate(
        nums = Count('news')
    )
    newslatest = News.objects.all().order_by('-date')[:3]
    return render(request, 'news_details.html', {
        'footer': footercontact,
        'testi': testi,
        'homestatic': homesta,
        'news': news2,
        'newslatest': newslatest,
        'newscat': newscat,
    })

def categories(request, pk):
    footercontact = FooterContact.objects.all()
    testi = Testominal.objects.all()
    homesta = HomeStatic.objects.get(id= 1)
    newscat = Category.objects.annotate(
        nums = Count('news')
    )
    page = request.GET.get('page', 1)
    news = News.objects.filter(newscat = pk).order_by('-id')
    newslatest = News.objects.all().order_by('-date')[:3]
    paginator = Paginator(news, 2)
    try:
        newsall = paginator.page(page)
    except PageNotAnInteger:
        newsall = paginator.page(1)
    except EmptyPage:
        newsall = paginator.page(paginator.num_pages)

    return render(request, 'news_cat.html', {
        'footer': footercontact,
        'testi': testi,
        'homestatic': homesta,
        'newsall': newsall,
        'newscat': newscat,
        'newslatest': newslatest,
    })