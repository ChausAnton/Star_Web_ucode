import numpy

def cramer(A, B):
    result = numpy.array([], copy=True)
    D = numpy.linalg.det(A)
    a_work = numpy.copy(A)
    for i in range(len(B)):
        a_work[:, i] = B
        result = numpy.append(result, numpy.linalg.det(a_work)/D)
        a_work = numpy.copy(A)
    return result
        



if __name__ == "__main__":
    myA=[
    [3, -2, 4],
    [3, 4, -2],
    [2, -1, -1]
    ]
    myB = [21, 9, 10]

    print(cramer(myA, myB))