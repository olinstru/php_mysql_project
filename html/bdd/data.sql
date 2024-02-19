DELETE FROM products;
ALTER TABLE products AUTO_INCREMENT = 1;

INSERT INTO products (name, price, image_url) VALUES
('Apple', 0.50, 'https://media.istockphoto.com/id/614871876/fr/photo/pomme-isol%C3%A9e-sur-fond-de-bois.jpg?s=2048x2048&w=is&k=20&c=tc87SI4rZT9NbINFvuLIA26x98odHKFqX0A7NbXSsjY='),
('Milk', 2.00, 'https://media.istockphoto.com/id/854296630/fr/photo/verre-de-lait-et-biberon-de-lait-sur-la-table-en-bois.jpg?s=2048x2048&w=is&k=20&c=c5SGil_O2Pgm1zcxuliDiUzZSTeiIWnQXTtss4Drez0='),
('Eggs', 1.50, 'https://media.istockphoto.com/id/1157804675/fr/photo/oeufs-bruns-dans-une-assiette.jpg?s=2048x2048&w=is&k=20&c=WXm4l3QDLezM1Nv3O4RwbGlOYT0TDNqD5jxl-tDlH84='),
('Bread', 2.50, 'https://media.istockphoto.com/id/1144562350/fr/photo/pain-frais-sur-une-planche-%C3%A0-d%C3%A9couper-et-le-sel.jpg?s=2048x2048&w=is&k=20&c=fhSnCx7pbJ2cpa742nxzvb18NfFt9yYFXcuomsr4iQ8=');
('Butter', 1.50, 'https://media.istockphoto.com/id/1338222224/fr/photo/blocs-et-morceaux-de-beurre-sur-table-en-bois-espace-de-copie.jpg?s=2048x2048&w=is&k=20&c=3fC0XWLf7DyfLxQCcGimqtC2A7v-4JODnNIc3SRYasQ=');


DELETE FROM `orders`;
ALTER TABLE `orders` AUTO_INCREMENT = 1;

