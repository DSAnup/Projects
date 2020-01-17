import os
import win32com.client

difile = os.getcwd()
word = win32com.client.Dispatch('Word.Application')

for dirpath, dirnames, filenames in os.walk(difile):
   for f in filenames:
      if f.lower().endswith(".docx"):
         new_name = f.replace(".docx", ".pdf")
         in_file = (dirpath + '/' + f)
         new_file = (dirpath + '/' + new_name)
         doc = word.Documents.Open(in_file)
         doc.SaveAs(new_file, FileFormat=17)
         doc.Close()
      if f.lower().endswith(".doc"):
         new_name = f.replace(".doc", ".pdf")
         in_file = (dirpath + '/' + f)
         new_file = (dirpath + '/' + new_name)
         doc = word.Documents.Open(in_file)
         doc.SaveAs(new_file, FileFormat=17)
         doc.Close()
   word.Quit()