from django.db import models
from django.utils.text import slugify
from PIL import Image
from ckeditor.fields import RichTextField
from django.utils import timezone

# Create your models here.

today = timezone.now
class Category(models.Model):
    name = models.CharField(max_length=50)
    def __str__(self):
        return self.name

class News(models.Model):
    newscat = models.ForeignKey(Category, on_delete=models.CASCADE, verbose_name="Category Name")
    img = models.ImageField(upload_to='news', verbose_name='News Picture')
    date = models.DateField()
    title = models.CharField(max_length=200)
    desc = RichTextField(blank=True, null=True)
    def save(self):
        if not self.img:
            return
        super(News, self).save()
        image = Image.open(self.img)
        image = image.resize((750, 340), Image.ANTIALIAS)
        image.save(self.img.path)

class Address(models.Model):
    address = models.CharField(max_length=150)
    phone = models.CharField(max_length=70)
    email = models.CharField(max_length=70)
    mapsrc = models.CharField(max_length=200)

class Query(models.Model):
    name = models.CharField(max_length=70)
    email = models.CharField(max_length=70)
    subject = models.CharField(max_length=200)
    message = models.TextField()
    date = models.DateField(default=today)

