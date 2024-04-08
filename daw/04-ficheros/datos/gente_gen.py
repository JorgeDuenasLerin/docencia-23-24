import faker
import pandas as pd

fake = faker.Faker(['es-ES'])

names = [fake.name() for _ in range(30)]
desc = [fake.paragraph(2) for _ in range(30)]
jobs = [fake.job() for _ in range(30)]
names_slug = [name.lower().replace(' ','-') for name in names]
names_slug = [name.lower().replace('á','a') for name in names_slug]
names_slug = [name.lower().replace('é','e') for name in names_slug]
names_slug = [name.lower().replace('í','i') for name in names_slug]
names_slug = [name.lower().replace('ó','o') for name in names_slug]
names_slug = [name.lower().replace('ú','u') for name in names_slug]
names_slug = [name.lower().replace('ñ','n') for name in names_slug]

df = pd.DataFrame(list(zip(names,names_slug,jobs,desc)), columns=['Nombre','Slug','Trabajo','Desc'])

df.to_csv('gente.csv', header=False)

#print(pd.io.sql.get_schema(df, 'gente'))
#for index, row in df.iterrows():
#  print('INSERT INTO gente ('+ str(', '.join(df.columns))+ ') VALUES '+ str(tuple(row.values)))
