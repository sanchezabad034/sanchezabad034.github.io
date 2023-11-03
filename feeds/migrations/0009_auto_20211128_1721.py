# Generated by Django 3.2.6 on 2021-11-28 14:21

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('feeds', '0008_contact_skills'),
    ]

    operations = [
        migrations.AlterField(
            model_name='skills',
            name='skilla',
            field=models.CharField(blank=True, max_length=50, null=True),
        ),
        migrations.CreateModel(
            name='SkillShow',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('num', models.IntegerField(blank=True, null=True)),
                ('name_id', models.ForeignKey(null=True, on_delete=django.db.models.deletion.SET_NULL, to='feeds.skills')),
            ],
        ),
    ]
