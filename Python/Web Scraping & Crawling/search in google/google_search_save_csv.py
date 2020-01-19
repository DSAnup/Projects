try:
    from googlesearch import search
except ImportError:
    print("No Module named 'google' Found")
class Google_Search:
    def __init__(self, name_search, topdomain):
        self.name = name_search
        self.domain = topdomain
    def Gsearch(self):
        my_results_list = []
        count = 0
        for i in search(query=self.name,        # The query you want to run
                        tld = self.domain,  # The top level domain
                        lang = 'en',  # The language
                        num = 10,     # Number of results per page
                        start = 0,    # First result to retrieve
                        stop = None,  # Last result to retrieve
                        pause = 2.0,  # Lapse between HTTP requests
                        ):
            my_results_list.append(i)
            count += 1
            print(count)
            with open(self.name+'.csv', 'w') as file:
                for line in my_results_list:
                    file.write(line)
                    file.write('\n')

if __name__=='__main__':
    print("Enter searching topic:")
    searchtopic = input()
    print("Enter top domin example: com")
    topdomain = input()
    mysearch = Google_Search(searchtopic, topdomain)
    mysearch.Gsearch()
