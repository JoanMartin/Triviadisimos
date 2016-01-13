/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package script;

import com.csvreader.CsvReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class WriteQuestions {

    private static final File folder = new File("questions");

    public static void main(String[] args) {
        try {
            DatabaseConnection db = new DatabaseConnection();
            db.createConnection("root", "", "bdtriviadisimos");

            for (File fileEntry : folder.listFiles()) {
                CsvReader questions = new CsvReader("questions/" + fileEntry.getName(), ';');
                
                String[] category = fileEntry.getName().split("\\."); //Remove the file extension '.csv'

                int idCategory = db.getIdCategory(category[0]);
                
                System.out.println("\n*********************************************\n" +
                        idCategory + " - " + category[0] +
                        "\n*********************************************");

                while (questions.readRecord()) {
                    String question = questions.get(0);
                    String answer1 = questions.get(1);
                    String answer2 = questions.get(2);
                    String answer3 = questions.get(3);
                    String answer4 = questions.get(4);

                    /*System.out.println(question + "\n     "
                            + answer1 + "\n     "
                            + answer2 + "\n     "
                            + answer3 + "\n     "
                            + answer4 + "\n     ");*/

                    db.insertQuestion(idCategory, question, answer1, answer2, answer3, answer4);
                }

                questions.close();
            }
            db.closeConnection();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(WriteQuestions.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException | SQLException ex) {
            Logger.getLogger(WriteQuestions.class.getName()).log(Level.SEVERE, null, ex);
        } catch (Exception ex) {
            Logger.getLogger(WriteQuestions.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
