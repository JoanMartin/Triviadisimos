/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package script;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;

public class DatabaseConnection {

    private static Connection conexion;

    public void createConnection(String user, String pass, String db_name) throws Exception {
        Class.forName("com.mysql.jdbc.Driver");
        conexion = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/" + db_name, user, pass);
    }

    public void closeConnection() throws SQLException {
        conexion.close();
    }
    
    
    public int getIdCategory(String category) throws SQLException {
        String query = "SELECT categoria.ID_Categoria as id FROM categoria "
                + "WHERE categoria.Nombre_Categoria = '" + category + "';";
        Statement st = (Statement) conexion.createStatement();
        ResultSet resultSet = st.executeQuery(query);
        resultSet.next();
        int id_category = Integer.parseInt(resultSet.getString("id"));
        
        return id_category;
    }

    public void insertQuestion(int idCategory, String question, String answer1, String answer2, String answer3, String answer4) throws SQLException {
        String query = "INSERT INTO pregunta VALUES"
                + "(NULL, '" + question + "', '" + idCategory + "');";
        Statement st = (Statement) conexion.createStatement();
        st.executeUpdate(query);

        query = "SELECT LAST_INSERT_ID() as id;";
        st = (Statement) conexion.createStatement();
        ResultSet resultSet = st.executeQuery(query);
        resultSet.next();
        int idQuestion = Integer.parseInt(resultSet.getString("id"));
        
        query = "INSERT INTO respuesta VALUES"
                + "(NULL, '" + idQuestion + "', '" + answer1 + "', '" + 1 + "');";
        st = (Statement) conexion.createStatement();
        st.executeUpdate(query);
        
        query = "INSERT INTO respuesta VALUES"
                + "(NULL, '" + idQuestion + "', '" + answer2 + "', '" + 0 + "');";
        st = (Statement) conexion.createStatement();
        st.executeUpdate(query);
        
        query = "INSERT INTO respuesta VALUES"
                + "(NULL, '" + idQuestion + "', '" + answer3 + "', '" + 0 + "');";
        st = (Statement) conexion.createStatement();
        st.executeUpdate(query);
        
        query = "INSERT INTO respuesta VALUES"
                + "(NULL, '" + idQuestion + "', '" + answer4 + "', '" + 0 + "');";
        st = (Statement) conexion.createStatement();
        st.executeUpdate(query);
    }
}
