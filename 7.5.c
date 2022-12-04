
#include <stdio.h>
main ()
{int mass[300],n,i,d;
printf("N=");
scanf("%d",&n);
for (i=0;i<n;i++)
{
printf("x[%d]=",i);
scanf("%d",&mass[i]);
}
d=mass[1]-mass[0];
for (i=2;i<n;i++)
{
if((mass[i]-mass[i-1])!=d) printf("false");
 
else  printf("true");}
}