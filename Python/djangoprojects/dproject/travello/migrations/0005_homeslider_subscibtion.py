# Generated by Django 3.0.1 on 2020-02-07 10:42

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('travello', '0004_testominal'),
    ]

    operations = [
        migrations.CreateModel(
            name='Homeslider',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(max_length=150)),
                ('img', models.ImageField(upload_to='homeslider')),
            ],
        ),
        migrations.CreateModel(
            name='Subscibtion',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=70)),
                ('email', models.CharField(max_length=120)),
            ],
        ),
    ]