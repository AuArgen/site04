#include<bits/stdc++.h>
using namespace std;
[[gnu::constructor]] void TIE(){cin.tie(nullptr)->sync_with_stdio(false);
    cout.tie(nullptr);
}
typedef long long int ll;

void solve1() {
}
int main () {
    ll t = 1, k, n, ans = 0,a = 0,q;
    string psu;
    char c;
    while (t--)
    {
        cin >> n;
        vector<char> mc(n);
        for (ll i = 0; i < n; i++) {
            cin >> mc[i];
        }
        for (ll i = 0; i < n-2; i++)
            {
                if (mc[i] == 'P' && mc[i+1] == 'S' && mc[i+2] == 'U')
                {
                    ans++;
                }
            }
        cout << ans<< "\n";
        cin >> q;
        psu = "";
        for (ll j = 0; j < q; j++)
        {
            cin >> k >> c;
            if ((mc[k-1] != c) && ((mc[k-1] == 'P' && mc[k] == 'S' && mc[k+1] == 'U') || (mc[k-2] == 'P' && mc[k-1] == 'S' && mc[k] == 'U') || (mc[k-3] == 'P' && mc[k-2] == 'S' && mc[k-1] == 'U'))) {
                ans--;
                mc[k - 1] = c;
            } else if (mc[k-1] != c) {
                ans = 0;
                mc[k - 1] = c;
                for (ll i = 0; i < n - 2; i++)
                {
                    if (mc[i] == 'P' && mc[i+1] == 'S' && mc[i+2] == 'U')
                    {
                        ans++;
                    }
                }
            }
            cout << ans << "\n";
        }
    }
    return 0;
}

/*
______________________________
7 3
2 6 4 3 6 8 3
______________________________
1] 2
2] 6
3] 4
4] 3
5] 6
6] 8
7] 3
8] 2 6
9] 6 4
10] 4 3
11] 3 6
12] 6 8
13] 8 3
14] 2 6 4
15] 6 4 3
16] 4 3 6
17] 3 6 8
18] 6 8 3
19] 6 4 3 6
20] 3 6 8 3
______________________________
*/
