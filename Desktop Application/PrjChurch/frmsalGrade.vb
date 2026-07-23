Imports System.Data.OleDb
Public Class frmsalGrade


    Public Sub stAddSalG()
        Try
            Call conns()
            str_sql_user_select = "SELECT * FROM Positions"

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            Call stAddSalG()

            Call generateId()


            'If ComboBox1.Text = "Teaching Staff" Or ComboBox1.Text = "Lecturer" Then
            ' TextBox1.Text = "0.0"
            'TextBox1.Enabled = False

            ' End If

            If TextBox1.Text = "" Then
                TextBox1.Text = "0.0"
            End If
            'If ComboBox1.Text <> "Teaching Staff" Or ComboBox1.Text = "Lecturer" Then

            'TextBox1.Enabled = True

            ' End If


            ' If ComboBox1.Text <> "Teaching Staff" Then
            ' TextBox1.Text = "0.0"
            ' TextBox1.Enabled = True

            ' End If

            ' If TextBox1.Text = "0.0" And ComboBox1.Text <> "Teaching Staff" And ComboBox1.Text <> "Lecturer" Then

            'TextBox1.Text = ""
            'MsgBox("Salary Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If

            If TextBox1.Text = "" Then

                MsgBox("Salary Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox12.Text = "" Then

                MsgBox("Salary Grade Can not be Empty!", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            If ComboBox1.Text = "" Then

                MsgBox("Employee State Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If ComboBox3.Text = "" Then

                MsgBox("Postion Details  Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            'If TextBox1.Text = "" Then

            'MsgBox("Surname Can not be Empty", MsgBoxStyle.Information, "SurName")
            'Exit Sub
            'End If


            If TextBox2.Text = "" Then

                MsgBox("Depatment Code Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            Call conns()
            Dim datebirth As String


            datebirth = CStr(DateTimePicker1.Value)

            Dim sqlString As String = ""
            sqlString = "INSERT INTO  [Positions]([vPosCode],[vAuto],[vSalGrade],[mSalary],[vPosition], [vDepartStaffCode], [vTeachingStaff], [dDate]) VALUES(" & _
             "'" & Me.TextBox3.Text.Trim & "'" & "," & _
             "'" & status & "'" & "," & _
              "'" & Me.TextBox12.Text.Trim & "'" & "," & _
              "" & Me.TextBox1.Text.Trim & "" & "," & _
             "'" & Me.ComboBox3.Text.Trim & "'" & "," & _
             "'" & Me.TextBox2.Text.Trim & "'" & "," & _
             "'" & Me.ComboBox1.Text.Trim & "'" & "," & _
              "'" & datebirth & " '" & ")"

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")
            Me.TextBox12.Text = ""
            Me.TextBox1.Text = ""
            Me.ComboBox3.Text = ""
            Me.TextBox2.Text = ""
            Me.ComboBox1.Text = ""
            Me.TextBox3.Text = ""

            Call generateId()
          

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private _departid As String
    Public Property DepartSaId() As String
        Get
            Return _departid

        End Get
        Set(ByVal value As String)
            _departid = value
            TextBox2.Text = _departid


        End Set
    End Property

    Private Sub TextBox2_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox2.DoubleClick
        frmEmpSearch.MdiParent = mdiChurch
        frmEmpSearch.Show()
        frmEmpSearch.BringToFront()
        frmEmpSearch.WindowState = FormWindowState.Normal

    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butexit.Click
        Me.Close()

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        Me.TextBox12.Text = ""
        Me.TextBox1.Text = ""
        Me.ComboBox3.Text = ""
        Me.TextBox2.Text = ""
        Me.ComboBox1.Text = ""
    End Sub

    Private Sub frmsalGrade_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 587
        Me.Height = 233
        Me.MdiParent = mdiChurch
    End Sub
    Private status As String
    Private Sub generateId()
        Try

            Dim rows As Integer
            Dim newdate, newdate1 As String
            Dim ad1 As Integer
            Dim dates As Date
            Dim year As String
            dates = CDate(DateTimePicker1.Text)

            year = DatePart(DateInterval.Year, dates)

            newdate = ""
            newdate1 = ""
            status = "Auto"

            Call conns()
            str_sql_user_select = "SELECT COUNT(vPosCode) AS [RecordCount] FROM  [positions] where vAuto ='" & status & "'  "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While
            'myreader.Close()
            myAccessReader.Close()
            strconss.Close()
            'mycon.Close()


            If rows = 0 Then
                newdate1 = "POS" & year & "00" & "1"
                TextBox3.Text = Trim(newdate1)
            End If

            If rows <> 0 Then



                '########## VALIDATION FOR NEW YEAR BEGINS HERE

                Dim maxId As String = ""
                Call conns()
                str_sql_user_select = "select  max(id) AS  PosiCode from Positions where vAuto ='" & status & "'  "
                
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                While myAccessReader.Read
                    maxId = Trim(myAccessReader("PosiCode")) & ""
                End While

                myAccessReader.Close()
                strconss.Close()

                Call conns()
                str_sql_user_select = "select  [dDate] from Positions where vAuto ='" & status & "' and id =" & maxId & "  "
                
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("dDate")) & ""


                End While
                myAccessReader.Close()
                strconss.Close()
                Dim newDate2 As Date
                newDate2 = CDate(newdate)
                newdate = DatePart(DateInterval.Year, newDate2)

                If Trim(year) <> Trim(newdate) Then
                    newdate1 = "POS" & year & "00" & "1"
                    TextBox3.Text = Trim(newdate1)
                    Exit Sub
                End If

                '########## END OF VALIDATION FOR NEW YEAR


                Call conns()
                str_sql_user_select = "select max(id)AS  [PositionId] from Positions where vAuto ='" & status & "'  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("PositionId")) & ""
                End While
                ad1 = CInt(newdate)
                ad1 += 1
                newdate = CStr(ad1)
                newdate1 = "POS" & year & "00" & newdate
                myAccessReader.Close()
                strconss.Close()
                'mycon.Close()
                TextBox3.Text = Trim(newdate1)
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub frmsalGrade_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmsalGrade_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.Left = 0
            Me.Top = 100
            Me.Width = 587
            Me.Height = 233
            Me.MdiParent = mdiChurch



            Me.TextBox12.Text = ""
            Me.TextBox1.Text = ""
            Me.ComboBox3.Text = ""
            Me.TextBox2.Text = ""
            Me.ComboBox1.Text = ""

            Call generateId()

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub TextBox3_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox3.TextChanged

    End Sub

    Private Sub TextBox12_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox12.TextChanged

    End Sub

    Private Sub ComboBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        ' If ComboBox1.Text = "Teaching Staff" Then
        ' TextBox1.Text = "0.0"
        ' TextBox1.Enabled = False

        ' End If


        ' If ComboBox1.Text <> "Teaching Staff" Then

        'TextBox1.Enabled = True

        'End If


    End Sub

    Private Sub ComboBox3_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox3.SelectedIndexChanged

        'If ComboBox3.Text = "Senior Teaching Staff" Or ComboBox3.Text = "Junior Teaching Staff" Then
        ' TextBox1.Text = "0.0"
        'TextBox1.Enabled = False

        ' End If





        'If ComboBox3.Text <> "Senior Teaching Staff" And ComboBox3.Text <> "Junior Teaching Staff" Then

        'TextBox1.Enabled = True

        ' End If







    End Sub
End Class