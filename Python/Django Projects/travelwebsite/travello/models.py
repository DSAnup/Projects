from django.db import models
from django.core.validators import FileExtensionValidator
from PIL import Image
from ckeditor.fields import RichTextField
from django.db.models import Q, F
from django.utils import timezone
# Create your models here.

today = timezone.datetime.now()
class CategoryDes(models.Model):
    name = models.CharField(max_length=50)

    def __str__(self):
        return self.name

class Destination(models.Model):
    category_id = models.ForeignKey(CategoryDes, blank=True, null=True, on_delete=models.CASCADE)
    name = models.CharField(max_length=100)
    img = models.ImageField(upload_to='pics')
    # desc = models.TextField()
    subtitle = models.CharField(max_length=150, blank=True, null=True)
    desc = RichTextField(blank=True, null=True)
    price = models.IntegerField()
    offer = models.BooleanField(default=False)

class Besttrip(models.Model):
    date = models.DateField()
    title = models.CharField(max_length=200)
    tag = models.CharField(max_length=70)
    desc = models.TextField()
    img = models.ImageField(upload_to='offpics')

class Testominal(models.Model):
    quote = models.CharField(max_length=200)
    author = models.CharField(max_length=80)
    designation = models.CharField(max_length=50)

class Subscibtion(models.Model):
    name = models.CharField(max_length=70)
    email = models.CharField(max_length=120)

class Homeslider(models.Model):
    title = models.CharField(max_length=150)
    img = models.ImageField(upload_to='homeslider')

    def save(self):
        if not self.img:
          return
        super(Homeslider, self).save()
        image = Image.open(self.img)
        image = image.resize((1920, 834), Image.ANTIALIAS)
        image.save(self.img.path)

class Intro(models.Model):
    title = models.CharField(max_length=100)
    subtitle = models.CharField(max_length=200)
    svgimg = models.FileField(upload_to='svgimg', validators=[FileExtensionValidator(['svg'])])

class FooterContact(models.Model):
    title = models.CharField(max_length=100)
    contact_info = RichTextField(blank=True, null=True)
    svgimg = models.FileField(upload_to='svgimg2', validators=[FileExtensionValidator(['svg'])])

class HomeStatic(models.Model):
    testiBackground = models.ImageField(upload_to='others')
    bestSide = models.ImageField(upload_to='others')
    footerBack = models.ImageField(upload_to='others')
    copyrighttext = RichTextField(blank=True, null = True)
    def save(self):
        if not self.testiBackground:
          return
        super(HomeStatic, self).save()
        image = Image.open(self.testiBackground)
        image = image.resize((1920, 593), Image.ANTIALIAS)
        image.save(self.testiBackground.path)

        if not self.bestSide:
          return
        super(HomeStatic, self).save()
        image = Image.open(self.bestSide)
        image = image.resize((1920, 593), Image.ANTIALIAS)
        image.save(self.bestSide.path)

        if not self.footerBack:
          return
        super(HomeStatic, self).save()
        image = Image.open(self.footerBack)
        image = image.resize((1920, 593), Image.ANTIALIAS)
        image.save(self.footerBack.path)

class about_us_fixed(models.Model):
    brief = RichTextField(blank=True, null=True, verbose_name='Description About')
    aboutimg = models.ImageField(upload_to='others')
    whybackground = models.ImageField(upload_to='others')
    class Meta:
        verbose_name = "About Us Section"

class why_choose_us(models.Model):
    icon = models.FileField(upload_to='why_choose', validators=[FileExtensionValidator(['svg'])])
    img = models.ImageField(upload_to='why_choose')
    title = models.CharField(max_length=100)
    shortdesc = models.CharField(max_length=200)

    class Meta:
        verbose_name = 'Why Choose Us'
        ordering = ['-title'] #desc

class team(models.Model):
    img = models.ImageField(upload_to='team', verbose_name='Picture')
    name = models.CharField(max_length=100)
    shortdesc = models.CharField(max_length=200)
    date = models.DateTimeField(default=today, blank=True)
    def save(self):
        if not self.img:
            return
        super(team, self).save()
        image = Image.open(self.img)
        image = image.resize((195, 195), Image.ANTIALIAS)
        image.save(self.img.path)

    class Meta:
        verbose_name = 'Our Team'
        ordering = ['name'] #asc