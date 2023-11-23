select Name from country where Name LIKE 'E%';

select * from city;

/*Tercera consulta*/
SELECT 
    District, Population
FROM
    city
WHERE
    Name = 'Kabul';

/*Segunda consulta*/
SELECT 
    city.Name
FROM
    city
        INNER JOIN
    country ON country.Code = city.CountryCode
WHERE
    country.Name = 'Aruba';
