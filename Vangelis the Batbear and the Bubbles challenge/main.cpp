#include <iostream>
#include<vector>
#include<list>

using namespace std;

/*
url :- 
https://csacademy.com/ieeextreme-practice/task/979a09a0cd8c4e98dd0a690f39a55bd2/

descreption:-
Given the map of the water distribution system, you need to make sure that the map does not contain loops. 

input :- 
2
4 5
0 1 0 2 1 2 2 3 0 3
6 5
0 1 0 3 1 2 1 5 3 4

output:
1
0

tags:
#DFS,#Graph,#loop_detection,#depth_first,#Extreme_11


*/

class Graph 
{ 
    int V;   
    list<int> *adj; 
    bool DFSUtil(int v, bool* visited,int); 
public: 
    Graph(int V);   
  
    void addEdge(int v, int w); 
  
    bool DFS(); 
}; 
Graph::Graph(int V) 
{ 
    this->V = V; 
    adj = new list<int>[V]; 
} 
  
void Graph::addEdge(int v, int w) 
{ 
    adj[v].push_back(w);
    adj[w].push_back(v);
} 

bool Graph::DFSUtil(int v, bool* visited,int parent) 
{ 
    visited[v] = true; 
    //operation on node
    
    list<int>::iterator i; 
    for (i = adj[v].begin(); i != adj[v].end(); ++i) {
        if(visited[*i]&&*i!=parent)
            return true;

        if (!visited[*i]) {
            if(DFSUtil(*i, visited,v))
                return true;
        }
    }
    return false;
        
} 
  
bool Graph::DFS() 
{ 
    bool *visited = new bool[V]; 
    for (int i = 0; i < V; i++) 
        visited[i] = false; 
        
    for (int i = 0; i < V; i++) {
        if(!visited[i])
            if(DFSUtil(i, visited,-1))
                return true;
    }
    return false;
} 
int main() {
    int t;
    cin >> t;
    while(t--){
        int n ,m;
        cin >> n >> m;
        Graph graph(n);
        int x,y;
        for(int i = 0 ; i < m ; i++){
            cin >> x >>y;
            graph.addEdge(x,y);
        }
        cout << graph.DFS()<<endl;
        
    }
    return 0;
}