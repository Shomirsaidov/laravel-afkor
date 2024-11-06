import pandas as pd
import numpy as np
import matplotlib.pyplot as plt

df = pd.read_csv('spitamen_train_dataset_.csv')  # Замените на ваш источник данных


# Биннинг доходов для анализа вероятности дефолта
df['income_bin'] = pd.cut(df['mon_income'], bins=np.arange(0, 20001, 1000))

# Рассчет вероятности дефолта по бинам дохода
default_rates = df.groupby('income_bin')['is_bad_30'].mean()

# Построение графика вероятности дефолта по уровням дохода
plt.figure(figsize=(12, 6))
default_rates.plot(kind='bar', color='skyblue')
plt.title('Вероятность дефолта в зависимости от дохода')
plt.xlabel('Доход (bins)')
plt.ylabel('Доля дефолтов (is_bad_30)')
plt.show()
