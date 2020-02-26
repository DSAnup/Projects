from django.contrib import admin
from django.utils.html import format_html
from django.shortcuts import redirect

from .models import *
# Register your models here.

admin.site.register(CategoryDes)

class DestinationAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn-primary" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn-danger" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.desc[:40]+'...'
        return format_html(str_slice)
    list_display = ('name', 'category_id', 'description', 'price', 'edit', 'delete')
admin.site.register(Destination, DestinationAdmin)

class BesttripAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('title', 'date', 'desc', 'edit', 'delete')
admin.site.register(Besttrip, BesttripAdmin)

class TestomonialAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('quote', 'author', 'designation', 'edit', 'delete')
admin.site.register(Testominal, TestomonialAdmin)

class SubcriptionAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('name', 'email', 'edit', 'delete')
admin.site.register(Subscibtion, SubcriptionAdmin)

class HomesliderAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    list_display = ('title', 'edit', 'delete')
admin.site.register(Homeslider, HomesliderAdmin)

class IntroAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('title', 'subtitle', 'edit', 'delete')
    def has_add_permission(self, request):
        count = Intro.objects.all().count()
        if count <= 2:
            return True
        return False
admin.site.register(Intro, IntroAdmin)

class FooterContent(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('title', 'contact_info', 'edit', 'delete')
    def has_add_permission(self, request):
        count = FooterContact.objects.all().count()
        if count <= 2:
            return True
        return False
admin.site.register(FooterContact, FooterContent)

class HomeFixedContent(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    list_display = ('testiBackground', 'bestSide', 'footerBack', 'edit', 'delete')
    def has_add_permission(self, request):
        count = HomeStatic.objects.all().count()
        if count == 0:
            return True
        return False
admin.site.register(HomeStatic, HomeFixedContent)

class AboutUs(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.brief[:40]+'...'
        return format_html(str_slice)
    list_display = ('description', 'aboutimg', 'whybackground', 'edit', 'delete')
    def has_add_permission(self, request):
        count = about_us_fixed.objects.all().count()
        if count == 0:
            return True
        return False
admin.site.register(about_us_fixed, AboutUs)

class WhyChoose(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.shortdesc[:40]+'...'
        return format_html(str_slice)
    list_display = ( 'title', 'description', 'img', 'edit', 'delete')
    def has_add_permission(self, request):
        count = why_choose_us.objects.all().count()
        if count <= 2:
            return True
        return False
admin.site.register(why_choose_us, WhyChoose)

class OurTeam(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.shortdesc[:40]+'...'
        return format_html(str_slice)
    list_display = ( 'name', 'description', 'img', 'date', 'edit', 'delete')
admin.site.register(team, OurTeam)