import numpy as np
import mysql.connector

# Ambil data hyperlink
db = mysql.connector.connect(host="localhost", user="root", password="", database="web")
cursor = db.cursor()
cursor.execute("SELECT MAX(idcrawler) FROM crawler")
n = cursor.fetchone()[0]

adj = np.zeros((n, n))
cursor.execute("SELECT from_node, to_node FROM hyperlink")
for from_node, to_node in cursor.fetchall():
    adj[to_node - 1][from_node - 1] = 1

def normalize(matrix):
    for i in range(matrix.shape[1]):
        col_sum = np.sum(matrix[:, i])
        if col_sum != 0:
            matrix[:, i] /= col_sum
    return matrix

def pagerank(M, d=0.85, tol=1e-6):
    N = M.shape[0]
    v = np.ones(N) / N
    delta = 1
    while delta > tol:
        v_new = (1 - d) / N + d * M @ v
        delta = np.linalg.norm(v_new - v, 1)
        v = v_new
    return v

M = normalize(adj)
ranks = pagerank(M)

for i, rank in enumerate(ranks, start=1):
    print(f"Halaman {i}: PageRank = {rank:.4f}")

cursor.close()
db.close()
