Imports System.Data.OleDb
Public Class frmAddChurchName

    Private Sub Label1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label2.Click

    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Try
            Call conns()

            If TextBox1.Text = "" Then
                MsgBox("Name of Church can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub

            End If

            Dim ids As Integer
            ids = 1

            Dim sqlString As String
            sqlString = "INSERT INTO  [School_Name]([vSC_Name]) VALUES(" & _
                      "'" & TextBox1.Text & " '" & ")"

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            '"" & ids & "," & _
            'mycon.Close()
            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")

            Button1.Enabled = False
            butDelete.Enabled = True

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [School_Name]"
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rowses As Integer
            While myAccessReader.Read
                rowses = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            ' mycon.Close()
            strconss.Close()

            If rowses <> 0 Then
                conns()

                str_sql_user_select = "SELECT * FROM  School_Name "

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ros As Integer = 0
                While myAccessReader.Read()


                    School_name = myAccessReader("vSC_Name")
                    'Label2.Text = School_name
                    ros += 1

                End While
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

    Private Sub frmAddChurchName_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

        Try
            Me.Left = 0
            Me.Top = 100


            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [School_Name]"
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
                conns()

                str_sql_user_select = "SELECT * FROM  School_Name "

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    Me.TextBox1.Text = myAccessReader("vSC_Name")

                    ro += 1

                End While
                ' mycon.Close()
                strconss.Close()

                If TextBox1.Text = "" Then
                    Me.Button1.Enabled = True
                    Me.butDelete.Enabled = False
                End If

                If TextBox1.Text <> "" Then
                    Me.butDelete.Enabled = True
                    Me.Button1.Enabled = False
                End If
            End If


            If TextBox1.Text = "" Then
                Me.Button1.Enabled = True
                Me.butDelete.Enabled = False
            End If

            If TextBox1.Text <> "" Then
                Me.butDelete.Enabled = True
                Me.Button1.Enabled = False
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Dim sqlString As String
            conns()
            sqlString = "UPDATE  [School_Name] SET " & _
                     "[vSC_Name] = '" & Me.TextBox1.Text & "'" & _
                    "WHERE id = " & 1 & ""



            'comUserSelect = New SqlCommand(sqlString, mycon)

            'comUserSelect.ExecuteNonQuery()


            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")

            ' mycon.Close()
            strconss.Close()
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [School_Name]"
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            Dim rowses As Integer
            While myAccessReader.Read
                rowses = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            ' mycon.Close()
            strconss.Close()
            If rowses <> 0 Then
                conns()

                str_sql_user_select = "SELECT * FROM  School_Name "

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ros As Integer = 0
                While myAccessReader.Read()


                    School_name = myAccessReader("vSC_Name")
                    'Label2.Text = School_name
                    ros += 1

                End While
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

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choice As String
            Dim del As String
            Choice = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
            If Choice = vbYes Then
                Call conns()
                del = "Truncate table School_Name"
                str_sql_user_select = del

                ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

            End If
            'mycon.Close()
            strconss.Close()
            MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")
            TextBox1.Text = ""
            Button1.Enabled = True
            butDelete.Enabled = False
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

End Class