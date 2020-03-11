# Generated by Django 3.0.1 on 2020-03-11 11:15

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('news', '0007_auto_20200310_0017'),
    ]

    operations = [
        migrations.AddField(
            model_name='news',
            name='readcount',
            field=models.IntegerField(default=0),
        ),
        migrations.AlterField(
            model_name='query',
            name='date',
            field=models.DateTimeField(blank=True, default=datetime.datetime(2020, 3, 11, 17, 15, 18, 489395)),
        ),
    ]