CREATE TABLE Films(
                      id serial primary key ,
                      name VARCHAR(255) NOT NULL,
                      country VARCHAR(55) NOT NULL,
                      year VARCHAR(4) not null,
                      actor VARCHAR(50) not null );

DROP TABLE films;

INSERT INTO films(NAME, COUNTRY, YEAR, ACTOR) values ('Бойцовский клуб', 'USA', '1999', 'Эдвард Нортон')

do $$
    declare
        maxvalue int;
    begin
        for r in 1981..2023 loop
                select max(id) + 1 into maxvalue from year;
                insert into year(id,year) values (maxvalue, r);
            end loop;
    end;
$$;