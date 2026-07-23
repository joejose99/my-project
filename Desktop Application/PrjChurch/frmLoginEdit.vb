Imports System.Data.OleDb
Public Class frmLoginEdit


    Public Sub Adlog()
        Try

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [login]"
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
                str_sql_user_select = "SELECT * FROM login "

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Public Sub Adlogv()
        Try
            Call conns()
            str_sql_user_select = "SELECT * FROM login where vusername='" & TextBox1.Text & "' or vPassoward='" & TextBox2.Text & "'"

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private rows As Integer
    Private Sub count()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [login]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            'Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private id As String
    Private Sub butsave_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butsave.Click
        Try

            Call count()
            If TextBox1.Text = "" Then

                MsgBox("User Name Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox2.Text = "" Then

                MsgBox("Password Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If rows > 0 Then
                Call Adlogv()
                Dim user, pass As String
                user = ""
                pass = ""
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'myreader.Read()

                    user = myAccessReader("vuserName")
                    pass = myAccessReader("vPassoward")

                    ro += 1
                End While
                If Trim(user) & "" = TextBox1.Text.Trim Then
                    MsgBox("User Name already used", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                If Trim(pass) & "" = TextBox2.Text.Trim Then
                    MsgBox("Password already used", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                strconss.Close()
            End If
            Call conns()


            Dim Enab As String
            Dim Expire As String
            Dim loc As String
            Enab = ""
            Expire = ""
            loc = ""

            Enab = "Enable"
            If RadioButton2.Checked = True Then
                RadioButton1.Checked = False
                Enab = "Enable"

            End If
            If RadioButton1.Checked = True Then
                RadioButton2.Checked = False
                Enab = "Disable"

            End If
            Expire = "Restore"

            If RadioButton3.Checked = True Then
                RadioButton4.Checked = False
                Expire = "Restore"

            End If
            If RadioButton4.Checked = True Then
                RadioButton3.Checked = False
                Expire = "Expire"

            End If

            loc = "Unlock"
            If RadioButton6.Checked = True Then
                RadioButton5.Checked = False
                loc = "Unlock"
            End If
            If RadioButton5.Checked = True Then
                RadioButton6.Checked = False
                loc = "Lock"
            End If
            If ComboBox2.Text = "" Then

                MsgBox("Role Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If




            Dim dateapp As String

            dateapp = CStr(DateTimePicker2.Value)

            Dim sqlString As String = ""
            str_sql_user_select = "INSERT INTO  [Login]([dDate],[vuserName],[vPassoward], [vRole], [vActtionE], [vActtionExp],[vActtionLoc]) VALUES(" & _
            "'" & dateapp & "'," & _
            "'" & Me.TextBox1.Text.Trim & "'" & "," & _
             "'" & Me.TextBox2.Text.Trim & "'" & "," & _
             "'" & Me.ComboBox2.Text.Trim & "'" & "," & _
             "'" & Enab.Trim & "'" & "," & _
             "'" & Expire.Trim & "'" & "," & _
              "'" & loc & " '" & ")"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            strconss.Close()
            butsave.Enabled = False
            butAdd.Enabled = True
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Student Details")


            Call listbox()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub butAdd_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butAdd.Click
        Me.TextBox1.Text = ""
        Me.TextBox2.Text = ""
        RadioButton1.Checked = False
        RadioButton2.Checked = False
        RadioButton3.Checked = False
        RadioButton4.Checked = False
        RadioButton5.Checked = False
        RadioButton6.Checked = False
        Me.ComboBox2.Text = ""
        butsave.Enabled = True
        butAdd.Enabled = False
    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Call conns()
            Dim Choice As String
            Choice = MsgBox("Are you sure you want to Edit?", vbYesNo + vbInformation, "Edit")
            If Choice = vbYes Then

                Dim Enab As String
                Dim Expire As String
                Dim loc As String
                Enab = ""
                Expire = ""
                loc = ""
                If TextBox1.Text = "" Then

                    MsgBox("User Name Can not be Empty", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If
                If TextBox2.Text = "" Then

                    MsgBox("Password Can not be Empty", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                If RadioButton2.Checked = True Then
                    RadioButton1.Checked = False
                    Enab = "Enable"

                End If
                If RadioButton1.Checked = True Then
                    RadioButton2.Checked = False
                    Enab = "Disable"

                End If

                If RadioButton3.Checked = True Then
                    RadioButton4.Checked = False
                    Expire = "Restore"

                End If
                If RadioButton4.Checked = True Then
                    RadioButton3.Checked = False
                    Expire = "Expire"

                End If
                If RadioButton6.Checked = True Then
                    RadioButton5.Checked = False
                    loc = "Unlock"
                End If
                If RadioButton5.Checked = True Then
                    RadioButton6.Checked = False

                    loc = "Lock"
                End If
                If ComboBox2.Text = "" Then

                    MsgBox("Role Can not be Empty", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If




                Dim dateapp As String

                dateapp = CStr(DateTimePicker2.Value)


                Dim sqlString As String

                sqlString = "UPDATE  [Login] SET " & _
                "[dDate] = '" & dateapp & "'," & _
                 "[vUsername] = '" & Me.TextBox1.Text & "'," & _
                 "[vPassoward] = '" & Me.TextBox2.Text & "'," & _
                "[vRole] = '" & ComboBox2.Text & "'," & _
                "[vActtionE] = '" & Enab & "'," & _
                "[vActtionExp] = '" & Expire & "'," & _
                "[vActtionLoc] = '" & loc & "'" & _
                "WHERE Id = " & id & ""



                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                MsgBox("Data has been Edited", MsgBoxStyle.Information, "Edit")
            End If

            Call listbox()
            Call binddata()
            'butEdit.Visible = False
            ' butDelete.Visible = False
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub CheckedListBox1_Click(ByVal sender As Object, ByVal e As System.EventArgs)

    End Sub

    Private Sub CheckedListBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub
    Private Sub listbox()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [login]"
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

                CheckedListBox1.Items.Clear()
                str_sql_user_select = "SELECT vusername FROM login"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    CheckedListBox1.Items.Add(myAccessReader(Trim("vusername") & ""))

                    ro += 1

                End While

                strconss.Close()
                myAccessReader.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Public Sub Adlogs()
        Try


            Dim enable, disenable, exp, restor, lock, unlock As String

            enable = "Enable"
            disenable = "Disable"
            exp = "Expire"
            restor = "Restore"
            lock = "Lock"
            unlock = "Unlock"




            Dim Enab As String
            Dim Expire As String
            Dim loc As String
            Enab = ""
            Expire = ""
            loc = ""

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [login]"
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
                str_sql_user_select = "SELECT * FROM login  where vusername='" & CheckedListBox1.Text & "'"
                'str_sql_user_select = "SELECT * FROM login "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    id = myAccessReader("id")
                    Me.TextBox1.Text = myAccessReader("vUsername")
                    Me.TextBox2.Text = myAccessReader("vPassoward")
                    Me.ComboBox2.Text = myAccessReader("vRole")
                    Enab = myAccessReader("vActtionE")
                    Expire = myAccessReader("vActtionExp")
                    loc = myAccessReader("vActtionLoc")
                    Me.DateTimePicker2.Text = CStr(myAccessReader("dDate"))

                    ro += 1

                End While


                If Trim(Enab) & "" = Trim(enable) & "" Then
                    RadioButton2.Checked = True
                End If

                If Trim(Enab) & "" = Trim(disenable) & "" Then
                    RadioButton1.Checked = True
                End If

                If Trim(Expire) & "" = Trim(restor) & "" Then
                    RadioButton3.Checked = True
                End If
                If Trim(Expire) & "" = Trim(exp) & "" Then
                    RadioButton4.Checked = True
                End If

                If Trim(loc) & "" = Trim(lock) & "" Then
                    RadioButton5.Checked = True
                End If
                If Trim(loc) & "" = Trim(unlock) & "" Then
                    RadioButton6.Checked = True
                End If

                'butEdit.Visible = False
                ' butDelete.Visible = False
                strconss.Close()
                myAccessReader.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private Sub binddata()
        Try
            Call Adlog()
            Dim enable, disenable, exp, restor, lock, unlock As String


            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [login]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                enable = "Enable"
                disenable = "Disable"
                exp = "Expire"
                restor = "Restore"
                lock = "Lock"
                unlock = "Unlock"




                Dim Enab As String
                Dim Expire As String
                Dim loc As String
                Enab = ""
                Expire = ""
                loc = ""

                Adlog()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                'While myreader.Read()
                myAccessReader.Read()
                id = myAccessReader("id")
                Me.TextBox1.Text = myAccessReader("vUsername")
                Me.TextBox2.Text = myAccessReader("vPassoward")
                Me.ComboBox2.Text = myAccessReader("vRole")
                Enab = myAccessReader("vActtionE")
                Expire = myAccessReader("vActtionExp")
                loc = myAccessReader("vActtionloc")
                Me.DateTimePicker2.Text = CStr(myAccessReader("dDate"))

                ro += 1

                ' End While

                If Trim(Enab) & "" = Trim(enable) & "" Then
                    RadioButton2.Checked = True
                End If

                If Trim(Enab) & "" = Trim(disenable) & "" Then
                    RadioButton1.Checked = True
                End If
                If Trim(Expire) & "" = Trim(restor) & "" Then
                    RadioButton3.Checked = True
                End If
                If Trim(Expire) & "" = Trim(exp) & "" Then
                    RadioButton4.Checked = True
                End If

                If Trim(loc) & "" = Trim(lock) & "" Then
                    RadioButton5.Checked = True
                End If
                If Trim(loc) & "" = Trim(unlock) & "" Then
                    RadioButton6.Checked = True
                End If

                'butEdit.Visible = False
                ' butDelete.Visible = False
                strconss.Close()
                myAccessReader.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub frmLoginEdit_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 619
        Me.Height = 341
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmLoginEdit_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 619
        Me.Height = 341
        Me.MdiParent = mdiChurch


        binddata()
        Call listbox()
    End Sub

    Private Sub butCancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butCancel.Click
        binddata()
        Call listbox()
        butAdd.Enabled = True
        butsave.Enabled = False

    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub CheckedListBox1_Click1(ByVal sender As Object, ByVal e As System.EventArgs) Handles CheckedListBox1.Click
        Adlogs()
    End Sub

    Private Sub CheckedListBox1_SelectedIndexChanged_1(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckedListBox1.SelectedIndexChanged
        Call listbox()

    End Sub

    Private Sub CheckedListBox1_SelectedValueChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles CheckedListBox1.SelectedValueChanged
        'Adlogs()
    End Sub

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choice As String
            Choice = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
            If Choice = vbYes Then
                Call conns()
                str_sql_user_select = "Delete  FROM [login] where vusername='" & TextBox1.Text & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


            End If
            'butEdit.Visible = False
            ' butDelete.Visible = False
            Call binddata()
            Call listbox()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub RadioButton3_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton3.CheckedChanged

        If RadioButton3.Checked = True Then
            RadioButton4.Checked = False


        End If
    End Sub

    Private Sub RadioButton4_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton4.CheckedChanged

        If RadioButton4.Checked = True Then
            RadioButton3.Checked = False


        End If
    End Sub

    Private Sub RadioButton6_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton6.CheckedChanged
        If RadioButton6.Checked = True Then
            RadioButton5.Checked = False
        End If

    End Sub

    Private Sub RadioButton5_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton5.CheckedChanged
        If RadioButton5.Checked = True Then
            RadioButton6.Checked = False
        End If
    End Sub
End Class