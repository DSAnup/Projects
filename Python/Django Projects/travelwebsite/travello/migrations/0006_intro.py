# Generated by Django 3.0.1 on 2020-02-07 10:52

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('travello', '0005_homeslider_subscibtion'),
    ]

    operations = [
        migrations.CreateModel(
            name='Intro',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(max_length=100)),
                ('subtitle', models.CharField(max_length=200)),
                ('svgimg', models.ImageField(upload_to='svgimg')),
            ],
        ),
    ]