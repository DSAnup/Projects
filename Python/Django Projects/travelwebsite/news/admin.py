from django.contrib import admin
from django.utils.html import format_html
from . models import *
# Register your models here.

admin.site.register(Category)

class NewsAdmin(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn-primary" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn-danger" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.desc[:40]+'...'
        return format_html(str_slice)
    list_display = ('title', 'newscat', 'description', 'date', 'img', 'edit', 'delete')
admin.site.register(News, NewsAdmin)

class Message(admin.ModelAdmin):
    def edit(self, obj):
        return format_html('<a class="btn-primary" href="/admin/{0}/{1}/{2}/change/">Change</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())

    def delete(self, obj):
        return format_html('<a class="btn-danger" href="/admin/{0}/{1}/{2}/delete/">Delete</a>'.format(obj._meta.app_label, obj._meta.object_name, obj.id).lower())
    def description(self, obj):
        str_slice = obj.message[:40]+'...'
        return format_html(str_slice)
    list_display = ('name', 'subject', 'email', 'description', 'date', 'edit', 'delete')
admin.site.register(Query, Message)