from django.shortcuts import render, get_object_or_404
from .models import *
from django.views.generic import CreateView
from django.http import HttpResponseRedirect, HttpResponse
from django.utils.text import slugify
from .forms import ExpenseForm
import json
# Create your views here.

def project_list(request):
    project_list = Project.objects.all()
    return render(request, 'budget/project-list.html', {'project_list': project_list})

def project_details(request, project_slug):
    # fetch the correct project
    project = get_object_or_404(Project, slug = project_slug)
    expense_list = project.expenses.all()
    if request.method == 'GET':
        category_list = Category.objects.filter(project = project)
        return render(request, 'budget/project-details.html', {'project': project, 'expense_list':expense_list,
                                                           'category_list': category_list})
    elif request.method == 'POST':
        form  = ExpenseForm(request.POST)
        if form.is_valid():
            title = form.cleaned_data['title']
            amount = form.cleaned_data['amount']
            category_name = form.cleaned_data['category']

            category = get_object_or_404(Category, project=project, name = category_name)
            Expense.objects.create(
                project = project,
                title = title,
                amount = amount,
                category = category
            ).save()
    elif request.method == 'DELETE':
        id = json.loads(request.body)['id']
        expense = get_object_or_404(Expense, id= id)
        expense.delete()

        return HttpResponse('')

    return HttpResponseRedirect(project_slug)

class ProjectCreateView(CreateView):
    model = Project
    template_name = 'budget/add-project.html'
    fields = {'name', 'budget'}

    def form_valid(self, form):
        self.object = form.save(commit = False)
        self.object.save()
        categories = self.request.POST['categoriesString'].split(',')
        for category in categories:
            Category.objects.create(
                project = Project.objects.get(id= self.object.id),
                name = category
            ).save()
        return HttpResponseRedirect(self.get_success_url())
    def get_success_url(self):
        return slugify(self.request.POST['name'])