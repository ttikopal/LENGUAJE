<?php
$documento = new DOMDocument();


$fechaActual = date('D, d M Y H:i:s O');
//Nodo alumnos.
$channel = $documento->createElement('channel');

$titlep = $documento -> createElement('title','Zapas God - Productos Destacados');

$linkp = $documento -> createElement('link','https://www.zapasgod.com');

$descriptionp = $documento -> createElement('descriptionp','Los productos más destacados de Zapas God');

$language = $documento -> createElement('language','es-es');

$channel->appendChild($titlep);
$channel->appendChild($linkp);
$channel->appendChild($descriptionp);
$channel->appendChild($language);


// Primer item

//Nodo alumno.
$item = $documento->createElement('item');
//Nombre nombre
$title = $documento->createElement('title', 'Nike Dunk x Parra');
//Nombre apellido
$link = $documento->createElement('link', 'https://www.zapasgod.com/producto/nike-dunk-x-parra');
//Nombre nivel
$description = $documento->createElement('description', 'Descubre las Nike Dunk x Parra, ¡con envíos gratis a toda España!');

$category = $documento ->createElement('category','Zapatillas');

$guid = $documento ->createElement('guid','https://www.zapasgod.com/producto/nike-dunk-x-parra');

$pubDate = $documento ->createElement('pubDate',$fechaActual);

//Agregamos los nodos hijos.
$item->appendChild($title);
$item->appendChild($link);
$item->appendChild($description);
$item->appendChild($category);
$item->appendChild($guid);
$item->appendChild($pubDate);

$channel->appendChild($item);




// Primer item
$item1 = $documento->createElement('item');
$title1 = $documento->createElement('title', 'Jordan 1 High Chicago OG');
$link1 = $documento->createElement('link', 'https://www.zapasgod.com/producto/jordan-1-high-chicago-og');
$description1 = $documento->createElement('description', 'Las legendarias Jordan 1 High Chicago OG. Consíguelas ahora.');
$category1 = $documento->createElement('category', 'Zapatillas');
$guid1 = $documento->createElement('guid', 'https://www.zapasgod.com/producto/jordan-1-high-chicago-og');
$pubDate1 = $documento->createElement('pubDate', $fechaActual);

// Agregar los elementos al nodo item
$item1->appendChild($title1);
$item1->appendChild($link1);
$item1->appendChild($description1);
$item1->appendChild($category1);
$item1->appendChild($guid1);
$item1->appendChild($pubDate1);

// Agregar el item al nodo raíz
$channel->appendChild($item1);

// Segundo item
$item2 = $documento->createElement('item');
$title2 = $documento->createElement('title', 'Jordan 1 Low x Travis Scott "Reverse Mocha"');
$link2 = $documento->createElement('link', 'https://www.zapasgod.com/producto/jordan-1-low-travis-scott-reverse-mocha');
$description2 = $documento->createElement('description', 'La Jordan 1 Low x Travis Scott "Reverse Mocha" es un must-have para los fanáticos del calzado.');
$category2 = $documento->createElement('category', 'Zapatillas');
$guid2 = $documento->createElement('guid', 'https://www.zapasgod.com/producto/jordan-1-low-travis-scott-reverse-mocha');
$pubDate2 = $documento->createElement('pubDate', $fechaActual);

// Agregar los elementos al nodo item
$item2->appendChild($title2);
$item2->appendChild($link2);
$item2->appendChild($description2);
$item2->appendChild($category2);
$item2->appendChild($guid2);
$item2->appendChild($pubDate2);

// Agregar el item al nodo raíz
$channel->appendChild($item2);

// Tercer item
$item3 = $documento->createElement('item');
$title3 = $documento->createElement('title', 'NB 2002R Protection Pack Grey');
$link3 = $documento->createElement('link', 'https://www.zapasgod.com/producto/nb-2002r-protection-pack-grey');
$description3 = $documento->createElement('description', 'Hazte con el exclusivo NB 2002R Protection Pack Grey, ¡un diseño que no pasa desapercibido!');
$category3 = $documento->createElement('category', 'Zapatillas');
$guid3 = $documento->createElement('guid', 'https://www.zapasgod.com/producto/nb-2002r-protection-pack-grey');
$pubDate3 = $documento->createElement('pubDate', $fechaActual);

// Agregar los elementos al nodo item
$item3->appendChild($title3);
$item3->appendChild($link3);
$item3->appendChild($description3);
$item3->appendChild($category3);
$item3->appendChild($guid3);
$item3->appendChild($pubDate3);

// Agregar el item al nodo raíz
$channel->appendChild($item3);

// Cuarto item
$item4 = $documento->createElement('item');
$title4 = $documento->createElement('title', 'Jordan 4 University Blue');
$link4 = $documento->createElement('link', 'https://www.zapasgod.com/producto/jordan-4-university-blue');
$description4 = $documento->createElement('description', 'La Jordan 4 University Blue, la zapatilla perfecta para cualquier ocasión.');
$category4 = $documento->createElement('category', 'Zapatillas');
$guid4 = $documento->createElement('guid', 'https://www.zapasgod.com/producto/jordan-4-university-blue');
$pubDate4 = $documento->createElement('pubDate', $fechaActual);

// Agregar los elementos al nodo item
$item4->appendChild($title4);
$item4->appendChild($link4);
$item4->appendChild($description4);
$item4->appendChild($category4);
$item4->appendChild($guid4);
$item4->appendChild($pubDate4);

// Agregar el item al nodo raíz
$channel->appendChild($item4);





//Agregamos todo el árbol al objeto.
$documento->appendChild($channel);
//Guardamos el XML.
$documento->save('zapatillas.xml');
echo "Fichero generado y guardado correctamente."
?>