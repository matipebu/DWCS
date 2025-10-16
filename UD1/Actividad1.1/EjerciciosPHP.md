# Actividades de PHP

## 📝 Ejercicio 1: Calculadora de IVA
Crea un script que utilice una función que calcule el **IVA** de un determinado producto a partir de su **precio base**.  
La función debe recibir 2 parámetros: 
- `precio base (float)`  
- `tipo de IVA (int)` (por defecto será **21%** si no se indica).

---

## 🔑 Ejercicio 2: LOGIN
Crea un script que compruebe si 2 cadenas contienen un **nombre de usuario** y una **contraseña** correctas.  
Pasos:
1. Comprobar que ambas cadenas **no estén vacías** con `empty`.  
2. Comprobar que usuario y contraseña son correctos.  
   - Usuario: `admin`  
   - Contraseña: `1234`

---

## ➕ Ejercicio 3: Sumatorio
Un procedimiento que reciba **cinco números enteros** como parámetros y muestre por pantalla la **suma total**.

---

## 📐 Ejercicio 4: Volumen de cilindro
Una función que reciba como parámetros:
- `radio` de la base  
- `altura`  

Y devuelva el volumen del cilindro:  
Volumen = π * radio * radio * altura
(π ≈ 3.1416)

---

## 🔄 Ejercicio 5: Reverso
Elaborar una función que reciba un número entero y devuelva el mismo número con los **dígitos invertidos**.  
Ejemplo: `1234 → 4321`.

Puedes usar funciones de `string`.

---

## ➕/➖ Ejercicio 6: Positivo, Negativo
Diseña un formulario con un campo de texto para escribir un número.  
Al enviar:  
- Si el número > 0 → **Positivo**  
- Si el número = 0 → **Cero**  
- Si el número < 0 → **Negativo**

---

## 🔀 Ejercicio 7: Anagramas
Una palabra es un **anagrama** de otra si contiene las mismas letras en distinto orden.  
Ejemplo: `CAVA` es anagrama de `VACA`.  

Haz un programa en PHP que pida dos palabras y compruebe si la primera es anagrama de la segunda.

---

## ⚡ Ejercicio 8: Función Potencia
Escribe una función PHP que reciba dos parámetros `(A, B)` y devuelva:  
A ^ B
Luego, escribe un programa que use esa función para calcular potencias.

---

## 📊 Ejercicio 9: Devolución de Arrays
Escribe un programa PHP que:
1. Pida **cinco números** al usuario y los guarde en un array.  
2. Llame a una función que:  
   - Devuelva el mayor  
   - El menor  
   - La media  
   en otro array.  
3. Mostrar los resultados en pantalla.

---

## 🎮 Ejercicio 10: Simon Dice
Juego de memoria con números del **1 al 4**.  
- El programa mostrará una secuencia de números aleatorios.  
- El usuario debe repetirlos.  
- Cada vez la secuencia se hace más larga.  
- El juego termina cuando el usuario se equivoca.
