SELECT a.mid AS mid_with_income_greater_than_17900000 FROM (SELECT mid, totalIncome FROM Sales GROUP BY mid HAVING totalIncome > 17900000 ORDER BY totalIncome) AS a
