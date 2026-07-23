Imports System.Data.OleDb
Imports System.IO
Public Class frmDptPuup

    Private Sub frmDptPuup_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try


            Me.Top = 220
            Me.Left = 510
            Me.Width = 483
            Me.Height = 368

            Me.MdiParent = mdiChurch

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department] "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()
                str_sql_user_select = "SELECT *  FROM Department "

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ' dt.Columns.Add("description", GetType(String))
                dtStudent.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtStudent.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtStudent.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtStudent.Rows(ro).Cells(2).Value = myAccessReader("id")
                    'dtStudent.Rows(ro).Cells(3).Value = myAccessReader("vFName")


                    ro += 1

                End While

                myAccessReader.Close()
                strconss.Close()

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub CheckBox2_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox2.CheckedChanged

    End Sub
    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try
            TextBox1.Items.Clear()
            TextBox1.Text = ""
            ComboBox1.Text = ""
            ComboBox1.Items.Clear()
            dtStudent.Rows.Clear()
            ComboBox2.Text = ""
            'TextBox3.Text = ""
            'TextBox4.Text = ""

            Call conns()
            Dim ro As Integer = 0
            str_sql_user_select = "SELECT COUNT(vDepartCode) AS [RecordCount] FROM  [Department] "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            ' myreader.Close()
            myAccessReader.Close()
            ' mycon.Close()
            strconss.Close()
            dtStudent.Rows.Clear()
            Call conns()
            ro = 0
            'str_sql_user_select = "SELECT * FROM Department  "

            str_sql_user_select = "SELECT * FROM Department  where vDepartName  like '" & TextBox2.Text & "%'  "

            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' dt.Columns.Add("description", GetType(String))

            dtStudent.Rows.Add(rows)

            While myAccessReader.Read()

                'reading from the datareader

                dtStudent.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                dtStudent.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                dtStudent.Rows(ro).Cells(2).Value = myAccessReader("id")




                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
            End While
            'mycon.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub dtStudent_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtStudent.DoubleClick
        Try

            frmWorkers.AddDpt = dtStudent.CurrentRow.Cells(0).Value
            frmEditWorkers.AddDpt = dtStudent.CurrentRow.Cells(0).Value
            ' frmEditDepart.MId = dtStudent.CurrentRow.Cells(0).Value

            If CheckBox2.Checked = False Then
                Me.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department] "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then

                TextBox1.Items.Clear()
                TextBox1.Text = ""
                ComboBox1.Text = ""
                ComboBox2.Text = ""
                ComboBox1.Items.Clear()
                dtStudent.Rows.Clear()

                TextBox2.Text = ""

                Call conns()
                str_sql_user_select = "SELECT * FROM Department "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                dtStudent.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtStudent.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtStudent.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtStudent.Rows(ro).Cells(2).Value = myAccessReader("Id")
                    'dtStudent.Rows(ro).Cells(3).Value = myAccessReader("vFName")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                End While

                ' myreader.Close()
                myAccessReader.Close()
                'mycon.Close()
                strconss.Close()




            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub dtStudent_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtStudent.CellContentClick

    End Sub
End Class