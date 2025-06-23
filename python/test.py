list1 = [1,2,3,4,5]
list2 = [5,6,7,8,9]
    
merged = []
pt1, pt2 = 0, 0

while pt1 < len(list1) and pt2 < len(list2):
    if list1[pt1] < list2[pt2]:
        merged.append(list1[pt1])
        pt1 += 1
    else:
        merged.append(list2[pt2])
        pt2 += 1

while pt1 < len(list1):
    merged.append(list1[pt1])
    pt1+=1
while pt2 < len(list2):
    merged.append(list2[pt2])
    pt2+=1

print(merged)
