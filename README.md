Universidad Tecnológica de Panamá
Facultad de Ingeniería de Sistemas Computacionales
Licenciatura en desarrollo y gestión de software

Desarrollo de software VII

Laboratorio: Seguridad en PHP con OpenSSL

Autor: Ruben Dominguez

Profesora: Irina Fong 

27 de mayo del 2026 


##  Introducción

La seguridad informática es un aspecto fundamental en el desarrollo de aplicaciones web modernas, ya que permite proteger la confidencialidad, integridad y autenticidad de la información. En PHP, una de las herramientas más utilizadas para implementar mecanismos de seguridad es la biblioteca OpenSSL, la cual proporciona funciones criptográficas avanzadas para cifrado, generación de claves, firmas digitales y certificados.

En este laboratorio se desarrollaron distintos ejemplos prácticos utilizando OpenSSL en PHP, enfocados en la generación de claves RSA, firmas digitales, verificación de mensajes y cifrado simétrico mediante el algoritmo AES-128-CBC. Además, se implementó una aplicación web interactiva capaz de cifrar y descifrar mensajes utilizando claves secretas y vectores de inicialización dinámicos.

---

#  Objetivo

Aplicar funciones criptográficas utilizando la biblioteca OpenSSL en PHP, comprendiendo el funcionamiento del cifrado, la firma digital y la verificación de mensajes mediante ejemplos prácticos ejecutados localmente en un entorno XAMPP.

---

#  Tecnologías Utilizadas

- PHP
- OpenSSL
- XAMPP
- HTML5
- CSS3

---

#  Archivos del Proyecto

---

##  encriptacion.php

Sistema web interactivo de cifrado simétrico utilizando el algoritmo AES-128-CBC con OpenSSL.

###  Funciones utilizadas
- openssl_random_pseudo_bytes()
- openssl_encrypt()
- openssl_decrypt()

###  Propósito
Permitir al usuario:
- ingresar un mensaje
- ingresar una clave secreta
- cifrar el mensaje
- descifrarlo automáticamente

###  Explicación
El sistema genera dinámicamente un Vector de Inicialización (IV) utilizando OpenSSL y posteriormente cifra el mensaje usando AES-128-CBC. Finalmente, el mensaje es descifrado automáticamente para comprobar la integridad de la información.

###  Código
[Ver archivo](https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/blob/main/encriptacion.php)

---

##  firma7.php

Generación de claves RSA, firma digital y verificación de datos.

###  Funciones utilizadas
- openssl_pkey_new()
- openssl_sign()
- openssl_verify()
- openssl_pkey_export()

###  Propósito
Crear:
- clave privada
- clave pública
- firma digital
- verificación de autenticidad

###  Explicación
Este archivo genera un par de claves RSA y utiliza la clave privada para crear una firma digital. Posteriormente, la firma es verificada mediante la clave pública para garantizar que el mensaje no haya sido alterado.

###  Código
[Ver archivo](https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/blob/main/firma7.php)

---

##  firmaOtra.php

Generación de certificado digital X.509 y llave privada.

###  Funciones utilizadas
- openssl_csr_new()
- openssl_csr_sign()
- openssl_x509_export()

###  Propósito
Crear:
- certificado digital
- CSR
- llave privada RSA

###  Explicación
Este archivo permite generar certificados digitales autofirmados utilizando OpenSSL. Los certificados son utilizados para validar identidades y proteger comunicaciones seguras.

###  Código
[Ver archivo](https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/blob/main/firmaOtra.php)

---

##  firmaMensaje.php

Firma y verificación de mensajes utilizando certificados digitales.

###  Funciones utilizadas
- openssl_sign()
- openssl_verify()
- openssl_pkey_get_private()
- openssl_pkey_get_public()

###  Propósito
Firmar un mensaje y verificar que no haya sido alterado.

###  Explicación
El mensaje es firmado utilizando una clave privada y posteriormente verificado mediante el certificado público. Esto garantiza autenticidad e integridad de la información.

###  Código
[Ver archivo](https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/blob/main/firmaMensaje.php)

---

##  cifrado_simple.php

Ejemplo básico de cifrado usando OpenSSL y AES-256-CBC.

###  Funciones utilizadas
- openssl_encrypt()
- hash_hmac()

###  Propósito
Realizar un cifrado básico de texto utilizando una clave y un HMAC de integridad.

###  Explicación
Se realiza un cifrado utilizando AES-256-CBC y posteriormente se genera un hash HMAC para validar la integridad del mensaje cifrado.

###  Código
[Ver archivo](https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/blob/main/cifrado_simple.php)

---

#  Carpeta keys/

Contiene:
- private_key.pem
- public_key.pem
- signature.dat

###  Propósito
Guardar:
- llaves RSA
- firmas digitales

###  Carpeta
https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/tree/main/keys

---

#  Carpeta keysCert/

Contiene:
- certout.csr
- privkey.pem

###  Propósito
Guardar:
- certificados digitales
- claves privadas

###  Carpeta
https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/tree/main/keysCert

---

#  Carpeta Capturas/

Contiene evidencias gráficas de:
- ejecución de scripts
- cifrado
- firmas digitales
- certificados generados

###  Carpeta
https://github.com/Rubendg12002/laboratorio-seguridad-php-openssl/tree/main/Capturas

---

#  Problemas Encontrados

Durante el desarrollo del laboratorio algunos equipos presentaron problemas con la ruta del archivo `openssl.cnf`.

##  Solución 1
Eliminar la ruta fija del archivo `.cnf` para permitir que XAMPP detecte automáticamente la configuración de OpenSSL.

##  Solución 2
Utilizar rutas dinámicas compatibles con distintas instalaciones de XAMPP.

---

#  Evidencias

<img width="200" height="100" alt="captura1" src="https://github.com/user-attachments/assets/cde5b718-fe1a-41c7-a925-4cbf4f7733f8" />


<img width="407" height="200" alt="captura2" src="https://github.com/user-attachments/assets/e6217a02-52e4-4bf3-96f0-1dc91e9517f3" />


<img width="1356" height="234" alt="captura3" src="https://github.com/user-attachments/assets/1a4d0ff6-aeef-4426-bca2-0970aec0bdb7" />


---

#  Resultados Obtenidos

Se logró ejecutar correctamente:

- Generación de claves RSA
- Firma digital
- Verificación de firmas
- Creación de certificados
- Cifrado y descifrado AES-128-CBC

Además, se verificó el correcto funcionamiento de OpenSSL dentro del entorno local XAMPP.

---

#  Conclusión

Este laboratorio permitió comprender la importancia de la criptografía en el desarrollo de aplicaciones web seguras. A través de OpenSSL en PHP se implementaron mecanismos de cifrado, generación de certificados y firmas digitales que garantizan la protección y autenticidad de la información.

También se fortalecieron conocimientos sobre claves públicas y privadas, algoritmos de cifrado y verificación de integridad de mensajes, elementos fundamentales en la seguridad informática moderna.
