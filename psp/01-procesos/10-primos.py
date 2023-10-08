#!/bin/env python3
import random

N_MIN=100
N_MAX=999
ITEMS=99999

def es_primo(n):
    if n <= 1:
        return False
    for i in range(2, int(n**0.5) + 1):
        if n % i == 0:
            return False
    return True


def generar_lista_numeros():
    """Genera una lista de ITEMS números aleatorios entre N_MIN y N_MAX."""
    return [random.randint(N_MIN, N_MIN) for _ in range(ITEMS)]

# Generar lista de números aleatorios
numeros = generar_lista_numeros()

# Encontrar la combinación de números cuya suma sea un número primo y sea la más grande
max_suma = 0
pareja_max = None
num_primos = 0

for i in range(len(numeros)):
    for j in range(i+1, len(numeros)):
        suma = numeros[i] + numeros[j]
        if es_primo(suma) and suma > max_suma:
            max_suma = suma
            num_primos = num_primos + 1
            pareja_max = (numeros[i], numeros[j])

print(num_primos, pareja_max, max_suma)